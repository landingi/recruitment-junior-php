# Landingi recruitment application

## Installation
Requires:
- Docker [https://docs.docker.com/engine/install](https://docs.docker.com/engine/install)

1. `git clone git@github.com:landingi/recruitment-junior-php.git`
2. `cd recruitment-junior-php`
3. `make up`
4. Go to [http://recruitment.localhost](http://recruitment.localhost)
5. Profit

## Everyday use

- Use `make up`, `make stop` and `make down` to start/stop/kill the docker containers.
- `docker-compose exec app bash` - get into container
- `make build` rebuilds the images if needed
- `make ci` runs the test suite
