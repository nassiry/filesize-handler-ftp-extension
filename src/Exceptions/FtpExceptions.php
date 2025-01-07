<?php


namespace Nassiry\FileSizeUtility\Extensions\Exceptions;

use RuntimeException;

class FtpExceptions extends RuntimeException
{
    // FTP server connection failure
    public static function ftpConnectionFailed($ftpHost): self
    {
        return new self("Unable to connect to FTP server: {$ftpHost}");
    }

    // FTP login failure
    public static function ftpLoginFailed($ftpUser): self
    {
        return new self("FTP login failed for user: {$ftpUser}");
    }

    // Unable to determine file size for FTP file
    public static function ftpFileSizeError($filePath): self
    {
        return new self("Unable to determine file size for FTP file: {$filePath}");
    }
}