#!/usr/bin/env bash

# Author: Dmitri Popov, dmpop@linux.com

#######################################################################
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#######################################################################

# Update sources and upgrade packages
sudo apt update
sudo apt upgrade -y

# Install the required packages
sudo apt install -y git-core gphoto2 php-cli

# Remove obsolete packages
sudo apt autoremove -y

# Clone and configure Sigh
cd
git clone https://github.com/dmpop/sigh.git

# Create sigh systemd service unit
sudo sh -c "echo '[Unit]' > /etc/systemd/system/sigh.service"
sudo sh -c "echo 'Description=Sigh' >> /etc/systemd/system/sigh.service"
sudo sh -c "echo '[Service]' >> /etc/systemd/system/sigh.service"
sudo sh -c "echo 'Restart=always' >> /etc/systemd/system/sigh.service"
sudo sh -c "echo 'ExecStart=/usr/bin/php -S 0.0.0.0:8000 -t /home/"$USER"/sigh' >> /etc/systemd/system/sigh.service"
sudo sh -c "echo 'ExecStop=/usr/bin/kill -HUP \$MAINPID' >> /etc/systemd/system/sigh.service"
sudo sh -c "echo '[Install]' >> /etc/systemd/system/sigh.service"
sudo sh -c "echo 'WantedBy=multi-user.target' >> /etc/systemd/system/sigh.service"
sudo systemctl enable sigh.service
sudo systemctl start sigh.service

dialog --clear --title "Setup finished" --backtitle "Sigh" --infobox "\nAll done! The system will reboot now." 5 45
sleep 5
clear
sudo reboot
