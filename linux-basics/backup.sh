#! /bin/bash

# Challenge: Tar a directory, compress it, and move it to another location.
# Schedule cron with */5 * * * * to run every five minutes.
# Read more at: https://blog.daniel-cobb.com/zip-it-up-and-script-it

pwd="$(pwd)/";
directory="${pwd}demo";
backup="${pwd}backups";
# Optional: Append the Date to the output file to create daily files that mv won't overwrite
backupDate=$(date +"%m_%d_%Y")

if [ -d $directory ]; then
    echo "Directory exists.";
    tar -cvf demo_${backupDate}.tar "$directory";
    gzip demo_${backupDate}.tar;
    mv demo_${backupDate}.tar.gz $backup;
else
    echo "Directory does not exist.";
fi
echo "Backup complete.";
exit;
