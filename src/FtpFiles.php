<?php
/**
 * Copyright (c) A.S Nassiry
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/nassiry/filesize-handler
 */

namespace Nassiry\FileSizeUtility\Extensions;

use Nassiry\FileSizeUtility\Extensions\Exceptions\FtpExceptions;
use Nassiry\FileSizeUtility\Sources\FileSourceInterface;

class FtpFiles implements FileSourceInterface
{
    /**
     * The FTP host address.
     *
     * @var string
     */
    private string $ftpHost;

    /**
     * The FTP username.
     *
     * @var string
     */
    private string $ftpUser;

    /**
     * The FTP password.
     *
     * @var string
     */
    private string $ftpPassword;

    /**
     * The file path on the FTP server.
     *
     * @var string
     */
    private string $filePath;

    /**
     * FtpFiles constructor.
     *
     * Initializes the FTP connection parameters.
     *
     * @param string $ftpHost The FTP host address.
     * @param string $ftpUser The FTP username.
     * @param string $ftpPassword The FTP password.
     * @param string $filePath The path to the file on the FTP server.
     */
    public function __construct(string $ftpHost, string $ftpUser, string $ftpPassword, string $filePath)
    {
        $this->ftpHost = $ftpHost;
        $this->ftpUser = $ftpUser;
        $this->ftpPassword = $ftpPassword;
        $this->filePath = $filePath;
    }

    /**
     * Gets the size of the file in bytes from the FTP server.
     *
     * Connects to the FTP server, logs in, and retrieves the file size.
     *
     * @return int The size of the file in bytes.
     *
     * @throws FtpExceptions If the FTP connection fails, login fails, or file size cannot be retrieved.
     */
    public function getSizeInBytes(): int
    {
        $connection = ftp_connect($this->ftpHost);

        if (!$connection) {
            throw FtpExceptions::ftpConnectionFailed($this->ftpHost);
        }

        $login = ftp_login($connection, $this->ftpUser, $this->ftpPassword);

        if (!$login) {
            ftp_close($connection);
            throw FtpExceptions::ftpLoginFailed($this->ftpUser);
        }

        $size = ftp_size($connection, $this->filePath);
        ftp_close($connection);

        if ($size === -1) {
            throw FtpExceptions::ftpFileSizeError($this->filePath);
        }

        return $size;
    }
}