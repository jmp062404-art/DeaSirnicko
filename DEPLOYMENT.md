# Railway Deployment Guide - DeaSirnicko

## 🚀 Quick Deploy to Railway

### Prerequisites
- [Railway Account](https://railway.app/) (free tier available)
- GitHub/GitLab repository (or use Railway CLI)

---

## 📦 Option 1: Deploy via GitHub (Recommended)

### 1. Push to GitHub
```bash
git init
git add .
git commit -m "Initial commit - ready for Railway"
git branch -M main
git remote add origin YOUR_GITHUB_REPO_URL
git push -u origin main
```

### 2. Connect to Railway
1. Go to [Railway Dashboard](https://railway.app/dashboard)
2. Click **"New Project"**
3. Select **"Deploy from GitHub repo"**
4. Choose your repository
5. Railway will auto-detect the Dockerfile

### 3. Add Database
1. In your Railway project, click **"+ New"**
2. Select **"Database"** → Choose **MySQL** or **PostgreSQL** (recommended)
3. Railway will automatically create connection variables

### 4. Configure Environment Variables
Go to your service → **Variables** tab and add:

```env
APP_KEY=base64:YOUR_GENERATED_KEY
APP_ENV=production
APP_DEBUG=false
APP_URL=https://${{RAILWAY_PUBLIC_DOMAIN}}

# Database variables are auto-populated by Railway
# Just verify DB_CONNECTION matches your database type:
DB_CONNECTION=mysql  # or pgsql for PostgreSQL
```

### 5. Generate APP_KEY
Run locally or in Railway CLI:
```bash
php artisan key:generate --show
```
Copy the output to `APP_KEY` variable in Railway.

### 6. Deploy!
- Railway will automatically build and deploy
- Check deployment logs for any issues
- Your app will be live at the provided Railway URL

---

## 📦 Option 2: Deploy via Railway CLI

### 1. Install Railway CLI
```bash
# Windows (PowerShell)
iwr https://railway.app/install.ps1 | iex

# macOS/Linux
sh -c "$(curl -fsSL https://railway.app/install.sh)"
```

### 2. Login to Railway
```bash
railway login
```

### 3. Initialize Project
```bash
cd c:\laragon\www\Dea'sproject\DeaSirnicko
railway init
```

### 4. Add Database
```bash
railway add --database mysql
# or
railway add --database postgresql
```

### 5. Link and Deploy
```bash
railway link
railway up
```

### 6. Set Environment Variables
```bash
railway variables set APP_KEY=$(php artisan key:generate --show)
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
```

### 7. Run Migrations
```bash
railway run php artisan migrate --force
```

---

## 🔧 Post-Deployment Tasks

### Run Database Migrations
```bash
# Via Railway CLI
railway run php artisan migrate --force

# Or via Railway Dashboard
# Service → Settings → Deploy → Add "Run Command"
# Command: php artisan migrate --force
```

### Seed Initial Data (Optional)
```bash
railway run php artisan db:seed --force
```

### Link Storage (if using local storage)
```bash
railway run php artisan storage:link
```

### Clear & Cache Config
```bash
railway run php artisan config:cache
railway run php artisan route:cache
railway run php artisan view:cache
```

---

## 📊 Environment Variables Checklist

### Required Variables
- ✅ `APP_KEY` - Generate with `php artisan key:generate --show`
- ✅ `APP_ENV=production`
- ✅ `APP_DEBUG=false`
- ✅ `APP_URL` - Your Railway domain (auto-populated)
- ✅ Database credentials (auto-populated by Railway MySQL/PostgreSQL plugin)

### Optional Variables
- `MAIL_MAILER`, `MAIL_HOST`, etc. - Email configuration
- `AWS_*` - If using S3 for file storage
- `REDIS_*` - If adding Redis service
- Session, cache, queue settings

---

## 🗄️ Database Options

### MySQL (Default)
Railway auto-creates these variables:
- `MYSQLHOST`
- `MYSQLPORT`
- `MYSQLDATABASE`
- `MYSQLUSER`
- `MYSQLPASSWORD`

Set: `DB_CONNECTION=mysql`

### PostgreSQL (Recommended)
Railway auto-creates these variables:
- `PGHOST`
- `PGPORT`
- `PGDATABASE`
- `PGUSER`
- `PGPASSWORD`

Set: `DB_CONNECTION=pgsql`

Update your `.env.production` accordingly.

---

## 📁 File Storage

### Option 1: Local Storage (Default)
Files stored in container (ephemeral, resets on redeploy).

### Option 2: Railway Volumes
Add persistent volume:
```bash
railway volume create storage
railway volume attach storage /var/www/html/storage/app
```

### Option 3: S3 (Recommended for Production)
1. Create AWS S3 bucket
2. Add AWS credentials to Railway variables
3. Update `.env`:
```env
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your_key
AWS_SECRET_ACCESS_KEY=your_secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your_bucket_name
```

---

## 🔍 Monitoring & Debugging

### View Logs
```bash
railway logs
```

### SSH into Container
```bash
railway shell
```

### Check Health
Visit: `https://your-app.railway.app/up`

### Common Issues

#### 1. "Vite manifest not found"
- Ensure `npm run build` runs in Dockerfile
- Check build logs for errors

#### 2. "500 Internal Server Error"
- Check `railway logs`
- Verify `APP_KEY` is set
- Run `railway run php artisan config:cache`

#### 3. Database Connection Error
- Verify database service is running
- Check `DB_CONNECTION` matches your database type
- Ensure database variables are populated

#### 4. "Storage not writable"
- Dockerfile sets permissions automatically
- If issues persist, consider using S3

---

## 🚦 CI/CD Pipeline

Railway automatically deploys on every push to `main` branch.

### Customize Build Command
In `railway.toml`, add:
```toml
[build]
builder = "DOCKERFILE"
dockerfilePath = "Dockerfile"

[deploy]
startCommand = "supervisord -c /etc/supervisor/conf.d/supervisord.conf"
healthcheckPath = "/up"
restartPolicyType = "ON_FAILURE"
```

---

## 🔒 Security Checklist

- ✅ Set `APP_DEBUG=false` in production
- ✅ Use strong `APP_KEY`
- ✅ Enable HTTPS (Railway provides by default)
- ✅ Set proper CORS policies
- ✅ Configure rate limiting
- ✅ Use environment variables for secrets
- ✅ Regular security updates

---

## 💰 Cost Estimation

### Free Tier
- $5 free credits per month
- Suitable for small projects
- May experience sleep on inactivity

### Pro Tier ($20/month)
- No sleep
- More resources
- Better performance

### Resource Usage
- Basic Laravel app: ~0.5 GB RAM
- Database: ~0.5 GB storage (starts small)
- Bandwidth: Generous limits

---

## 📚 Additional Resources

- [Railway Documentation](https://docs.railway.app/)
- [Laravel Deployment](https://laravel.com/docs/deployment)
- [Railway Discord](https://discord.gg/railway)

---

## 🆘 Support

If you encounter issues:
1. Check Railway logs: `railway logs`
2. Review deployment guide above
3. Check Railway status: https://status.railway.app
4. Join Railway Discord for community support

---

**Happy Deploying! 🎉**
