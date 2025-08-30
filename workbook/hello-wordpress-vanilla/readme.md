# Hello Wordpress Vanilla
> starter project for Wordpress local development setups

## Credentials
http://localhost:3000/wp_admin -> username=admin / password=admin / email=admin@test.com

## Troubleshooting

### Permissions issues on /uploads directory
- because of the way Docker works on MacOS, the ownership of the `/uploads` directory is not set correctly for Wordpress to write to it.
- you can fix this by running the following command in the terminal:
```bash
sudo chown -R 33:33 ./backend/cms/hello-wordpress-blog-site-cms/src/wp-content/uploads
```
