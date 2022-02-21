# Docker-XAMPP

Run bash in container
````
(alias docker="winpty docker") for git-bash
docker exec -it [container-id] bash
````

Rebuild service
````
docker-compose up -d --no-deps --build nginx
````

Execute shell in container
````
docker ps
docker exec -it <container id> sh
````