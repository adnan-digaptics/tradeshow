# GitHub Pages deployment

The GitHub Pages workflow builds the PHP templates into static HTML and deploys
the generated files from `_site` when changes are pushed to `main`.

To build locally, run:

```sh
php build-static.php
```

GitHub Pages does not run PHP. The contact and quote forms are therefore
replaced in the published site with email/contact instructions; form submissions
and file uploads require PHP-capable hosting.
