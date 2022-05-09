# Docker setup for a Symfony project

Based on the setup described here: https://www.twilio.com/blog/get-started-docker-symfony

## Prerequisites
- Docker Desktop.

## Getting started
```docker-compose up -d --build```

```docker-compose exec php /bin/bash```

```symfony new .```

## Database setup

```DATABASE_URL="mysql://symfony:symfony@database:3306/symfony?serverVersion=8.0"```

