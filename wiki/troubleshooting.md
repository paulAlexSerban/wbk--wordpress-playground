# Troubleshooting

## Permissions issues on /uploads directory
- because of the way Docker works on MacOS, the ownership of the `/uploads` directory is not set correctly for Wordpress to write to it.
- you can fix this by running the following command in the terminal:
```bash
sudo chown -R 33:33 ./hello-wordpress-core-setup/backend/cms/hello-wordpress-core-setup-cms/src/wp-content/uploads
```

## `auto-terms-of-service-privacy-policy` plugin not updated to the latest version of PHP
- run `docker exec hello-wordpress-core-setup wp plugin list --allow-root` after you install plugin and activate it to see if it creates issues
- if it does, you can:
    - use it to create content for the legal pages you desire, copy the content and then deactivate the plugin
- if there are not issues, you can use it to create the legal pages you need and use it accordingly and delete this section from the README

## How to deactivate plugin if locked out of dashboard
- go to FPT File Manager and rename plugin director in `/wp-content/plugins/PLUGIN_DIR`

## Locked out by Security Plugin AIOS (All-in-on Security)
- you need to rest it's setting
- use previous tip: "How to deactivate plugin if locked out of dashboard"
- install - All-in-One WP Security Reset plugin - follow - https://www.tipsandtricks-hq.com/wordpress-security-and-firewall-plugin