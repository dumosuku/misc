#!/usr/bin/expect -f

# Set the username and password for sudo
set USERNAME "supersusadmin"
set SUDO_PASSWORD "supersus"

# Set options for SSH
set SSH_OPTIONS "-o StrictHostKeyChecking=no"

# Set the path to the authorized_keys file
set AUTHORIZED_KEYS_PATH "/home/${USERNAME}/.ssh/authorized_keys"

# Set your public SSH key
set PUBLIC_KEY "YOUR_PUBLIC_SSH_KEY"

# Open the HOSTFILE
set HOST [open "HOSTFILE" r]

# Loop through the list of host and append your public key to the authorized_keys file
foreach host [split [read $HOST] "\n"] {
    # Skip empty lines and comments
    if {[string trim $HOST] eq "" || [string index $host 0] eq "#"} {
        continue
    }

    # Spawn an SSH session to the remote host
    spawn ssh $SSH_OPTIONS ${USERNAME}@${HOST}

    # Expect a password prompt
    expect "password:"

    # Send the password
    send "REMOTE_USER_PASSWORD\r"

    # Wait for the command prompt to appear
    expect "${USERNAME}@*"

    # Create the .ssh directory if it doesn't exist
    send "mkdir -p /home/${USERNAME}/.ssh\r"
    expect "${USERNAME}@*"

    # Append your public key to the authorized_keys file
    send "echo '${PUBLIC_KEY}' >> ${AUTHORIZED_KEYS_PATH}\r"
    expect "${USERNAME}@*"

    # Set the correct permissions on the authorized_keys file
    send "chmod 600 ${AUTHORIZED_KEYS_PATH}\r"
    expect "${USERNAME}@*"

    # Close the SSH session
    send "exit\r"
    expect eof
}

# Close the HOSTFILE
close $HOST