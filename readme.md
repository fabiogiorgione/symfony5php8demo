# start

```bash
cp .env .env.local
cp .env.test .env.test.local
```

edit file `.env.local` for docker variables

edit file `.env.test.local` for docker test variables

## launch the container with the environment variables

```bash
env $(cat .env.local | command grep -i ^[A-Z] | xargs) docker-compose up -d
```

alternatively, MakeFile has been added to more easily manage console operations. \
To start the project under development:
```bash
make start
```
To start build the project:
```bash
make build
```
To stop containers:
```bash
make stop
```
To stop containers and delete volumes:
```bash
make stop-with-volumes
```

To get the php service shell and run the commands from within:
```bash
make shell
```

## install composer dependencies of the project

```bash
docker-compose run --rm -u www-data php php -d memory_limit=-1 /usr/local/bin/composer install
```

another interesting command, similar to the previous one, to be able to execute commands inside the container
with the appropriate user is this:

```bash
docker exec --user=www-data nome_container command_to_exec
```

or:
```bash
make dependencies
```

## Database creation and management

```bash
docker exec -it php_container_name /bin/bash
bin/console doctrine:database:create
```

```bash
bin/console doctrine:schema:validate
```
```bash
bin/console doctrine:schema:create

```bash
bin/console doctrine:schema:update --force
```