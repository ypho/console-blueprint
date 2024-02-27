![GitHub License](https://img.shields.io/github/license/ypho/console-blueprint)
![GitHub top language](https://img.shields.io/github/languages/top/ypho/console-blueprint?color=%23A353AE)
![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/ypho/console-blueprint/push.yml)
![GitHub repo size](https://img.shields.io/github/repo-size/ypho/console-blueprint)

# Console Blueprint
This project contains some basic components to build a PHP console application from scratch. It uses some of the
Illuminate packages for quick development.

## Setting up your own project
If you plan to use this blueprint to setup your own project from scratch, you should follow these steps:

Clone the complete repository to your local filesystem
```shell
git clone git@github.com:ypho/console-blueprint.git
```

Remove the .git folder, so it becomes a "clean" project that you can add to your own Git repository later
```shell
cd console-blueprint && \
rm -rf .git
```

To add this project to your own repository, make sure you have an (empty) Git repository. Then run the following 
commands to be able to commit the code to that repository. Make sure you place the correct URL in **\<url>** of
the command.
```shell
git init && \
git remote add origin <url>
```

## Running the Console project
This project runs completely in Docker. To start the container, just run the command below. The first time you run this
command, some Docker images will be downloaded before the container is built.
```shell
docker compose up -d
````

After the container is built, install all dependencies using:
```shell
docker compose exec -ti console composer install
```

Before using, you can check if everything works in order, by running the test suite:
```shell
docker compose exec -ti console composer test
```

## Development
When the project is set up, you can start your development. The structure is pretty simple, all code is placed in the
**/src** folder, and the commands are placed in the sub folder **/src/Commands**. Namespacing is set in composer.json
and should therefore be automatically applied by your IDE.

### Running Tests
When PhpStorm is set up correctly, you can run the tests through Docker. To run them manually (including coverage), use
the command below. The code coverage will be generated in HTML and placed in the **logs/phpunit/coverage** folder.
```shell
docker compose exec -ti console composer test
```

### Code Quality
If you want to monitor the quality of your code, PHPStan is installed in the initial version of this project. If you're
not familiar with PHPStan, it is a tool you can run for static code analysis. It is configured in **phpstan.neon**, and
can be tweaked if necessary. To run PHPStan from the Docker container, use this command:
```shell
docker compose exec -ti console composer quality
```

### GitHub Workflow
This Console Blueprint also comes with a GitHub workflow file to ensure all tests run successfully, and the static code
analysis doesn't fail. It will run in GitHub every time a push is done to the **main** branch, or a PR is created that
targets the **main** branch.

If you have `nektos/act` running locally (you can install this with Homebrew), it is possible to check if the GitHub 
workflow passes, you can use the following command:
```shell
act -P ubuntu-latest=shivammathur/node:latest
```

Ir you run on Apple Silicon (i.e. M1, M2, M3 etc.), you can get the correct architecture by running the following:
```shell
act -P ubuntu-latest=shivammathur/node:latest --container-architecture linux/amd64
```