## Intruduction
This is an archive of my previous blog which was first launched in 2012 and now is abandoned since I decide to migrate to [withparaodx2.github.io](withparaodx2.github.io), which is more intuitive and easier to maintain. With the help of Docker, I'm  able to deloy and visit it within a minute anytime in the future.

## Run
- Clone this project to your local machine
- Install docker compose
- Run `docker-compose up -d`
- After all service are up, visit `http://localhost:8000`

User name and password are all set to `withparadox2`.

## Useful tips
### docker-compose up -d
Run docker compose in detach mode.

### docker-compose down
Shutdown servers.

### docker volume ls
List all volumes.

### docker volume rm [volume_name] -f
Remove a specific volume. If you want to execute dumy.sql each time while starting a mysql container, make sure the volume of mysql be removed.

### docker system prune --volumes
Remove a lot of stuffs.
