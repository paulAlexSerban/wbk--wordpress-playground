# Wordpress Playground (Workbook)

# Troubleshooting

## Database backup permission issues
- `./infrastructure/orchestration/docker/base.wordpress.docker-compose.bash: line 109: ../../../database/backup/university-website.20251006130858.sql: Permission denied` => you need to fix direcotry permissions
```bash
# Create the directory and set proper permissions
sudo mkdir -p ../../../database/backup
sudo chown $USER:$USER ../../../database/backup
sudo chmod 755 ../../../database/backup
```