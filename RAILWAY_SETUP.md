# 🚂 Railway Setup Guide - Complete Walkthrough

## 📑 Table of Contents
1. [Overview](#overview)
2. [Files Created](#files-created)
3. [Deployment Methods](#deployment-methods)
4. [Step-by-Step Guide](#step-by-step-guide)
5. [Configuration](#configuration)
6. [Troubleshooting](#troubleshooting)

---

## 🎯 Overview

Your Laravel application is now configured for modern deployment on Railway with:

- ✅ **Production-ready Dockerfile** with Nginx + PHP-FPM
- ✅ **Automated build process** with Vite asset compilation
- ✅ **Queue workers** running via Supervisor
- ✅ **Health checks** for monitoring
- ✅ **Environment templates** for easy configuration
- ✅ **Deployment scripts** for automation
- ✅ **Comprehensive documentation**

---

## 📦 Files Created

### Docker Configuration
```
Dockerfile                    # Main production Docker image
.dockerignore                 # Build optimization
docker/
  ├── nginx.conf             # Nginx main configuration
  ├── default.conf           # Site-specific Nginx config
  └── supervisord.conf       # Process management
```

### Railway Configuration
```
railway.toml                  # Railway platform config
nixpacks.toml                 # Alternative build system
.env.production               # Production environment template
```

### Documentation
```
README.md                     # Project overview
DEPLOYMENT.md                 # Detailed deployment guide
QUICK_START.md                # 5-minute quick deploy
SYSTEM_ANALYSIS.md            # Complete system analysis
PRE_DEPLOYMENT_CHECKLIST.md   # Pre-flight checklist
RAILWAY_SETUP.md              # This file
```

### Scripts
```
deploy.ps1                    # PowerShell deployment script
deploy.sh                     # Bash deployment script
test-docker.ps1               # Test Docker build (PowerShell)
test-docker.sh                # Test Docker build (Bash)
```

### CI/CD
```
.github/workflows/deploy.yml  # GitHub Actions pipeline
```

### Development
```
docker-compose.yml            # Local Docker development
```

---

## 🚀 Deployment Methods

### Method 1: GitHub + Railway Dashboard (Recommended) ⭐

**Best for:** Most users, CI/CD workflow, team collaboration

**Time:** ~5 minutes

**Steps:**
1. Push code to GitHub
2. Create Railway project from GitHub repo
3. Add database service
4. Set environment variables
5. Deploy automatically

**Pros:**
- ✅ Automatic deployments on every push
- ✅ Easy rollback to previous versions
- ✅ Great for team collaboration
- ✅ Visual dashboard

**Cons:**
- ❌ Requires GitHub account
- ❌ Need to configure webhook

---

### Method 2: Railway CLI (Power Users) ⚡

**Best for:** Developers comfortable with command line

**Time:** ~3 minutes

**Steps:**
1. Install Railway CLI
2. Login and link project
3. Run deployment script
4. Automatic setup

**Pros:**
- ✅ Fastest deployment
- ✅ Full control via CLI
- ✅ Easy to automate
- ✅ Great for CI/CD

**Cons:**
- ❌ Requires CLI comfort level
- ❌ Manual environment variable setup

---

### Method 3: Docker + Railway (Advanced) 🔧

**Best for:** Custom Docker configurations, advanced users

**Time:** ~10 minutes

**Steps:**
1. Test Docker build locally
2. Push to Railway
3. Configure manually
4. Deploy

**Pros:**
- ✅ Full Docker control
- ✅ Test locally before deploy
- ✅ Reproducible builds

**Cons:**
- ❌ More complex setup
- ❌ Requires Docker knowledge

---

## 📋 Step-by-Step Guide

### 🎯 Method 1: GitHub + Railway (Detailed)

#### Step 1: Prepare Your Repository

1. **Initialize Git** (if not already done)
   ```bash
   git init
   git add .
   git commit -m "Initial commit - Ready for Railway"
   ```

2. **Create GitHub Repository**
   - Go to [github.com/new](https://github.com/new)
   - Name: `deasirnicko` (or your choice)
   - Don't initialize with README (we have one)
   - Click "Create repository"

3. **Push to GitHub**
   ```bash
   git remote add origin https://github.com/YOUR_USERNAME/deasirnicko.git
   git branch -M main
   git push -u origin main
   ```

#### Step 2: Create Railway Project

1. **Go to Railway**
   - Visit [railway.app](https://railway.app)
   - Sign in (GitHub login recommended)

2. **Create New Project**
   - Click "New Project"
   - Select "Deploy from GitHub repo"
   - Choose your repository
   - Railway will detect the Dockerfile automatically

3. **Initial Deployment**
   - Railway starts building immediately
   - First build takes ~5-10 minutes
   - You can watch the logs

#### Step 3: Add Database

1. **Add Database Service**
   - In your project, click "+ New"
   - Select "Database"
   - Choose **MySQL** (matches your current setup) or **PostgreSQL**

2. **Wait for Database**
   - Takes ~30 seconds to provision
   - Connection variables auto-generated

3. **Verify Variables**
   - Click on your database service
   - Go to "Variables" tab
   - Should see: HOST, PORT, DATABASE, USER, PASSWORD

#### Step 4: Configure Environment Variables

1. **Go to Your App Service**
   - Click on your main application service
   - Go to "Variables" tab

2. **Add Required Variables**
   
   Click "+ New Variable" and add:

   **Required:**
   ```
   Variable Name: APP_KEY
   Value: [Generate with: php artisan key:generate --show]
   ```

   ```
   Variable Name: APP_ENV
   Value: production
   ```

   ```
   Variable Name: APP_DEBUG
   Value: false
   ```

   ```
   Variable Name: DB_CONNECTION
   Value: mysql (or pgsql if you chose PostgreSQL)
   ```

   **Optional but Recommended:**
   ```
   Variable Name: APP_URL
   Value: ${{RAILWAY_PUBLIC_DOMAIN}}
   ```

3. **Save Variables**
   - Railway will automatically restart the service

#### Step 5: Run Migrations

1. **Install Railway CLI**
   ```bash
   npm install -g @railway/cli
   ```

2. **Login**
   ```bash
   railway login
   ```

3. **Link Project**
   ```bash
   cd c:\laragon\www\Dea'sproject\DeaSirnicko
   railway link
   ```
   - Select your project from the list

4. **Run Migrations**
   ```bash
   railway run php artisan migrate --force
   ```

5. **Seed Data** (optional)
   ```bash
   railway run php artisan db:seed --force
   ```

#### Step 6: Verify Deployment

1. **Get Your URL**
   - In Railway dashboard
   - Go to Settings → Domains
   - You'll see: `your-app.railway.app`

2. **Test Health Check**
   ```bash
   curl https://your-app.railway.app/up
   # Should return: OK
   ```

3. **Visit Your App**
   - Open in browser: `https://your-app.railway.app`
   - Should see your Laravel welcome page

4. **Test Registration/Login**
   - Go to `/register`
   - Create an account
   - Verify functionality

#### Step 7: Monitor

1. **View Logs**
   ```bash
   railway logs --follow
   ```

2. **Check Metrics**
   - Railway Dashboard → Your Service
   - See CPU, Memory, Network usage

---

### ⚡ Method 2: Railway CLI (Quick)

#### One-Time Setup

```bash
# Install Railway CLI
npm install -g @railway/cli

# Login
railway login

# Link project (first time only)
railway link
```

#### Deploy

Run the automated script:

**PowerShell (Windows):**
```powershell
.\deploy.ps1
```

**Bash (Mac/Linux):**
```bash
chmod +x deploy.sh
./deploy.sh
```

The script will:
1. Check Railway authentication
2. Link project (if not linked)
3. Generate and set APP_KEY
4. Set environment variables
5. Deploy to Railway

---

## ⚙️ Configuration

### Environment Variables Reference

#### Required Variables

| Variable | Value | Description |
|----------|-------|-------------|
| `APP_KEY` | `base64:...` | Generate with `php artisan key:generate --show` |
| `APP_ENV` | `production` | Environment name |
| `APP_DEBUG` | `false` | Disable debug mode in production |
| `DB_CONNECTION` | `pgsql` or `mysql` | Database driver |

#### Auto-Generated (by Railway Database Plugin)

**PostgreSQL:**
- `PGHOST` → Used as `DB_HOST`
- `PGPORT` → Used as `DB_PORT`
- `PGDATABASE` → Used as `DB_DATABASE`
- `PGUSER` → Used as `DB_USERNAME`
- `PGPASSWORD` → Used as `DB_PASSWORD`

**MySQL:**
- `MYSQLHOST` → Used as `DB_HOST`
- `MYSQLPORT` → Used as `DB_PORT`
- `MYSQLDATABASE` → Used as `DB_DATABASE`
- `MYSQLUSER` → Used as `DB_USERNAME`
- `MYSQLPASSWORD` → Used as `DB_PASSWORD`

#### Optional Variables

| Variable | Example | Purpose |
|----------|---------|---------|
| `APP_URL` | `https://your-app.railway.app` | Application URL |
| `MAIL_MAILER` | `smtp` | Email driver |
| `MAIL_HOST` | `smtp.mailtrap.io` | SMTP server |
| `REDIS_HOST` | `redis.railway.app` | Redis server |
| `AWS_BUCKET` | `my-bucket` | S3 storage |

### Railway-Specific Variables

Railway provides these automatically:

| Variable | Description |
|----------|-------------|
| `PORT` | Port the app should listen on (default: 8080) |
| `RAILWAY_ENVIRONMENT` | Current environment |
| `RAILWAY_PROJECT_NAME` | Your project name |
| `RAILWAY_PUBLIC_DOMAIN` | Your app's public URL |

---

## 🔍 Troubleshooting

### Common Issues and Solutions

#### 1. Build Fails

**Error:** `npm run build failed`

**Solution:**
```bash
# Test locally first
npm install
npm run build

# Check for errors
# Fix any issues
# Commit and push again
```

---

#### 2. Database Connection Error

**Error:** `Connection refused` or `Access denied`

**Solution:**
- Verify `DB_CONNECTION` matches your database type (pgsql/mysql)
- Check database service is running in Railway
- Ensure database variables are populated
- Test connection:
  ```bash
  railway run php artisan tinker
  # Run: DB::connection()->getPdo();
  ```

---

#### 3. Vite Manifest Not Found

**Error:** `Vite manifest not found`

**Solution:**
```bash
# This means assets didn't build
# Check build logs in Railway

# Test locally:
npm run build
# Should create files in public/build/

# If successful locally, rebuild on Railway:
git commit --allow-empty -m "Rebuild"
git push
```

---

#### 4. 500 Internal Server Error

**Error:** White screen or 500 error

**Solution:**
```bash
# Check logs
railway logs

# Clear caches
railway run php artisan config:clear
railway run php artisan cache:clear
railway run php artisan view:clear

# Recache
railway run php artisan config:cache
railway run php artisan route:cache
railway run php artisan view:cache
```

---

#### 5. Storage Not Writable

**Error:** `The stream or file could not be opened`

**Solution:**
```bash
# Railway runs as www-data user
# Permissions are set in Dockerfile

# If issues persist, check logs:
railway run ls -la storage/logs

# Or use S3 for file storage
```

---

#### 6. Queue Jobs Not Processing

**Error:** Jobs stuck in database

**Solution:**
```bash
# Check supervisor is running
railway logs | grep supervisor

# Manually process a job:
railway run php artisan queue:work --once

# Check queue table:
railway run php artisan tinker
# Run: DB::table('jobs')->count();
```

---

#### 7. APP_KEY Not Set

**Error:** `No application encryption key has been specified`

**Solution:**
```bash
# Generate key
php artisan key:generate --show

# Add to Railway variables:
railway variables set APP_KEY=base64:YOUR_KEY_HERE

# Or via dashboard:
# Variables tab → + New Variable → APP_KEY
```

---

### Debug Checklist

When things go wrong:

- [ ] Check Railway build logs
- [ ] Check Railway runtime logs: `railway logs`
- [ ] Verify all environment variables are set
- [ ] Test health endpoint: `/up`
- [ ] Verify database connection
- [ ] Check disk space (rare, but possible)
- [ ] Review recent commits for breaking changes
- [ ] Test Docker build locally: `.\test-docker.ps1`

---

## 📊 Performance Tips

### After Deployment

1. **Enable Caching**
   ```bash
   railway run php artisan config:cache
   railway run php artisan route:cache
   railway run php artisan view:cache
   ```

2. **Add Redis** (Optional)
   - Railway Dashboard → + New → Database → Redis
   - Update cache driver to Redis
   - Better performance for sessions and cache

3. **Configure CDN** (Optional)
   - Use Cloudflare for static assets
   - Faster global delivery

4. **Monitor Performance**
   - Railway provides CPU/Memory metrics
   - Consider Sentry for error tracking
   - Use Laravel Telescope for debugging (dev only)

---

## 🎉 Success Checklist

After deployment, verify:

- [x] App accessible at Railway URL
- [x] Health check returns `OK`
- [x] Database connected
- [x] Can register new user
- [x] Can login
- [x] Assets loading (CSS/JS)
- [x] File uploads work (if applicable)
- [x] Queue jobs processing
- [x] No errors in logs

---

## 📞 Getting Help

### Resources

- **Railway Docs:** https://docs.railway.app
- **Railway Discord:** https://discord.gg/railway
- **Laravel Docs:** https://laravel.com/docs
- **Project Docs:** Check other MD files in this repo

### Debug Commands

```bash
# View logs
railway logs --follow

# Check status
railway status

# List variables
railway variables

# SSH into container
railway shell

# Run artisan commands
railway run php artisan [command]
```

---

## 🎓 Next Steps

After successful deployment:

1. **Security**
   - [ ] Configure CORS
   - [ ] Set up rate limiting
   - [ ] Review security headers
   - [ ] Enable 2FA for admin users

2. **Features**
   - [ ] Configure email service
   - [ ] Set up file storage (S3)
   - [ ] Add Redis for better performance
   - [ ] Implement monitoring

3. **Custom Domain** (Optional)
   - Railway Settings → Domains
   - Add your custom domain
   - Update DNS records

4. **Backups**
   - Railway Pro provides automatic backups
   - Or set up manual backup strategy

---

**🎊 Congratulations! Your app is live on Railway!**

For quick reference, see `QUICK_START.md`  
For detailed guide, see `DEPLOYMENT.md`
