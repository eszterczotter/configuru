# configuru/configuru

## Installation

If you are using composer,
you can easily install Configuru for your project.

```
composer require configuru/configuru --dev
```

It is recommended
that you only require this package for development,
since this is intended to be a build tool.

## Getting Started

### Add configuru.yml

Add a configuru.yml file to your root,
containing all the key-value pairs to replace.
 
```yml
replace:
  key: "value"
```

### Add .guru files

For each file you wish to replace,
add a `.guru` file in the same folder.
For example,
if you wish to build your `config.yml` file,
add a `config.yml.guru` file to your project
and use `:(key)` in the `.guru` file
as a placeholder for the value
you configured in `configuru.yml`.

### Build with configuru

```
vendor/bin/configuru build
```

This command will look for all the `.guru` files
in your project folders recursively
and replace the configured keys with the values
and save them to a file with the same filename,
but without the .guru extension.

*Configuru will overwrite any file it encounters!*