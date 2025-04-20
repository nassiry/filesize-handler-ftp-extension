<div align="center">

# PHP FileSizeHandler - FTP Extension

![Packagist Downloads](https://img.shields.io/packagist/dt/nassiry/filesize-handler-ftp-extension)
![Packagist Version](https://img.shields.io/packagist/v/nassiry/filesize-handler-ftp-extension)
![PHP](https://img.shields.io/badge/PHP-%5E8.0-blue)
![License](https://img.shields.io/github/license/nassiry/filesize-handler-ftp-extension)

</div>


The **FTP Extension** for [FileSizeHandler](https://github.com/nassiry/filesize-handler) enables support for retrieving file sizes from FTP servers.

### Features
- Fetch file sizes from FTP servers.
- Seamlessly integrates with the main [FileSizeHandler](https://github.com/nassiry/filesize-handler) library.


## Installation

Install the extension via Composer:

```bash
composer require nassiry/filesize-handler-ftp-extension
```

## Usage
```php
use Nassiry\FileSizeUtility\FileSizeHandler;
use Nassiry\FileSizeUtility\Extensions\FtpFiles;

$handler = FileSizeHandler::create()
    ->from(new FtpFiles(
        'ftp.example.com',    // FTP host
        'ftp_user',           // FTP username
        'ftp_password',       // FTP password
        '/path/to/file.txt'   // File path on FTP server
    ))
    ->format();

echo $handler; // Output: "4.56 MiB"
```

### Contributing
Feel free to submit issues or pull requests to improve the package. Contributions are welcome!


### Changelog

See [CHANGELOG](CHANGELOG.md) for release details.

### License
This package is open-source software licensed under the [MIT license](LICENSE).
