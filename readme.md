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

Or if you wish,
you can install it globally.

```
composer global require configuru/configuru --dev
```

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
add a guru file in the same folder.
For example,
if you wish to build your `config.yml` file,
add a `config.guru.yml` file to your project
and use `:(key)` in the guru file
as a placeholder for the value
you configured in `configuru.yml`.

### Build with configuru

```
vendor/bin/configuru build
```

This command will look for all the guru files
in your project folders recursively
and replace the configured keys with the values
and save them to a file with the same filename,
but without the `.guru` extension.

*Configuru will overwrite any file it encounters!*

## Advanced Usage

### Escape keys

If you have text in your files in the format `:(key)`,
but you don't wish to replace it,
just add a backslash before the colon to escape that key,
like this: `\:(key)`. It will be replaced with the string
`:(key)` without the backslash.

### Build path

By default, Configuru will build every guru file
it can find within the current working directory.
You can specify a different path
as the first argument of the command.

```
vendor/bin/configuru build path/to/build
```

### All file types

Notice that Configuru will build any text file,
not just the typical config file extensions
(yaml, php, json) but any text file you want
as long as the filename contains `.guru`,
it will use that file
to build the same file without `.guru` in the filename. 