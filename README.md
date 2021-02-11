# ShareX-Server
ShareX-Server is a powerful ShareX server. You can use this if you prefer host your pictures on your own server or your own website instead of host your pictures on a publics websites, or for multiple reasons.
<br />
The ShareX software is required for use ShareX-Server. You can access to the official website of ShareX for download the software by clicking <a href="https://getsharex.com/downloads/">here</a>.
<br /><br />
This server can works to latest version of PHP, and it is compatible with Apache and Nginx.
<br /><br />
# Features
• Upload files
<br /><br />
# Installation
<b>1 -</b> Download the files of this repository.
<br /><br />
<b>2 -</b> Upload the downloaded files on your server or in the files manager of your website.
<br /><br />
<b>3 -</b> Extract the files of the compressed folder. <i>(If before the extraction you have a .htaccess file in the files of your website, it is recommanded to delete it.<br />Warning : If you use a panel for manage your website, check if it does not have an option for see hidden files. If you can, it is recommanded to use the (s)FTP service, it does not hide the files.)</i>
<br /><br />
<b>4 -</b> Delete the compressed folder. <i>(Optional. This action reduces the used disk space.)</i>
<br /><br />
<b>5 -</b> Open the `server.php` file with a code editor, and follow the instructions who are located in this last.
<br /><br />
<b>6 -</b> Create a folder named `images` in the directory where you can find the `server.php` file of the ShareX server.
<br /><br />
# Configuration of the ShareX software
<b>1 -</b> Open the ShareX sofware.
<br /><br />
<b>2 -</b> In the list of tools at up at left, click on the button named `Destination`, then click on the `Custom uploader settings…` button.
<br /><br />
<b>3 -</b> Click on the `New` button.
<br /><br />
<b>4 -</b> In the `URL` field, indicate the domain name of your website, or the IP adress of your server if you haven't domain name.
<br />
In the dropdown list named `Body`, select `Form data (multipart/form-data)`.
<br />
In the table who are located below the dropdown list, incate in the first line at the `Name` column `username` and in the next colomn your username, the one you specified in the `server.php` file.
<br />
A second line appeared in the table, incate in the second line at the `Name` column `password` and in the next column your password, the one you have also specified in the `server.php` file.
<br /><br />
<b>5 -</b> Click on the `Response` tab.
<br /><br />
<b>6 -</b> In the `URL` field, indicate `$json:url$`.
<br />
Leave blank the `Thumbnail URL` field.
<br />
In the `Deletion URL` field, indicate `$json:deletion_url$`.
<br />
Then, in the `Error message` field, indicate `$json:status$`.
<br /><br />
<b>7 -</b> Close the window of configuration of the remote server.
<br /><br />
<b>8 -</b> Click on the `Destination` button, then pass your cursor on the `Image uploader: [...]` button, and select `Custom image uploader`.
<br /><br />
# Support
If you need help, open new issue by cliking <a href="https://github.com/NexusDeveloppement/ShareX-Server/issues/new">here</a>.
