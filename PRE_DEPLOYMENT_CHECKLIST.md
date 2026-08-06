# ✅ Pre-Deployment Checklist - DeaSirnicko

Complete this checklist before deploying to Railway.

---

## 📋 Code Preparation

- [ ] All changes committed to Git
  ```bash
  git status  # Should be clean
  ```

- [ ] `.env` file NOT committed (check `.gitignore`)
  ```bash
  git check-ignore .env  # Should show .env
  ```

- [ ] Dependencies installed and working locally
  ```bash
  composer install
  npm install
  ```

- [ ] Application key generated
  ```bash
  php artisan key:generate --show
  # Save this for Railway!
  ```

- [ ] Assets built successfully
  ```bash
  npm run build
  # Should complete without errors
  ```

- [ ] Local tests passing (if you have tests)
  ```bash
  php artisan test
  ```

---

## 🔧 Configuration Review

- [ ] Database configuration supports PostgreSQL
  - Laravel is already configured for both MySQL and PostgreSQL ✅

- [ ] Queue driver set correctly (database or Redis)
  - Currently: `QUEUE_CONNECTION=database` ✅

- [ ] Session driver appropriate for production
  - Currently: `SESSION_DRIVER=database` ✅

- [ ] Cache driver configured
  - Currently: `CACHE_STORE=database` ✅

- [ ] File storage strategy decided
  - [ ] Local (ephemeral, resets on redeploy)
  - [ ] Railway Volumes (persistent)
  - [ ] S3/Cloud Storage (recommended)

- [ ] Error reporting configured
  - Production should have `APP_DEBUG=false` ✅

---

## 🐙 GitHub/Git Setup

- [ ] Repository created on GitHub/GitLab
  ```bash
  # Create repo on GitHub, then:
  git remote add origin YOUR_REPO_URL
  ```

- [ ] All files pushed to main branch
  ```bash
  git add .
  git commit -m "Ready for Railway deployment"
  git push -u origin main
  ```

- [ ] `.gitignore` properly configured ✅
  - Already set up to exclude sensitive files

- [ ] Railway deployment files committed ✅
  - Dockerfile
  - docker/
  - railway.toml
  - All deployment docs

---

## 🚂 Railway Setup

- [ ] Railway account created
  - Sign up at [railway.app](https://railway.app)

- [ ] Railway CLI installed (optional but recommended)
  ```bash
  npm install -g @railway/cli
  ```

- [ ] Railway CLI authenticated (if using CLI)
  ```bash
  railway login
  ```

- [ ] Project created on Railway
  - Can be done via dashboard or CLI

---

## 🗄️ Database Planning

- [ ] Database type chosen
  - [ ] MySQL (currently configured in .env.example)
  - [ ] PostgreSQL (recommended for Railway)

- [ ] Database service added in Railway
  - Click "+ New" → "Database" → Choose type

- [ ] Connection variables noted
  - Railway auto-generates these ✅

- [ ] Migration strategy planned
  - Fresh install: `railway run php artisan migrate --force`
  - With sample data: `railway run php artisan migrate:fresh --seed --force`

- [ ] Backup plan for production data
  - Railway provides automatic backups for Pro plan

---

## 🔐 Environment Variables

### Required Variables
- [ ] `APP_KEY` generated
  ```bash
  php artisan key:generate --show
  ```

- [ ] `APP_ENV=production`

- [ ] `APP_DEBUG=false`

- [ ] `APP_URL` (will use Railway domain)

- [ ] Database variables (auto-set by Railway)
  - DB_CONNECTION
  - DB_HOST, DB_PORT, DB_DATABASE
  - DB_USERNAME, DB_PASSWORD

### Optional but Recommended
- [ ] Mail configuration
  - MAIL_MAILER
  - MAIL_HOST
  - MAIL_PORT
  - MAIL_USERNAME
  - MAIL_PASSWORD
  - MAIL_FROM_ADDRESS

- [ ] AWS S3 (if using cloud storage)
  - AWS_ACCESS_KEY_ID
  - AWS_SECRET_ACCESS_KEY
  - AWS_DEFAULT_REGION
  - AWS_BUCKET

---

## 🛡️ Security Check

- [ ] APP_DEBUG set to false for production
- [ ] Strong APP_KEY generated
- [ ] Database credentials secure
- [ ] No sensitive data in `.env.example`
- [ ] HTTPS will be enforced (Railway provides this ✅)
- [ ] CORS configured if needed
- [ ] Rate limiting enabled on auth routes

---

## 📝 Documentation Review

- [ ] README.md updated with project info ✅
- [ ] DEPLOYMENT.md reviewed ✅
- [ ] QUICK_START.md reviewed ✅
- [ ] Environment variables documented ✅

---

## 🚀 Deployment Method Chosen

Choose ONE method:

### Method 1: GitHub Integration (Easiest)
- [ ] Code pushed to GitHub
- [ ] Railway project created from GitHub repo
- [ ] Automatic deployments enabled
- [ ] Environment variables configured in Railway

### Method 2: CLI Deployment
- [ ] Railway CLI installed
- [ ] Authenticated with Railway
- [ ] Project linked: `railway link`
- [ ] Deploy script ready: `deploy.ps1` or `deploy.sh`

### Method 3: Manual Setup
- [ ] Following DEPLOYMENT.md step-by-step

---

## 📊 Post-Deployment Plan

After deployment, you will:

- [ ] Verify health check: `https://your-app.railway.app/up`
- [ ] Run migrations: `railway run php artisan migrate --force`
- [ ] Seed initial data (if needed): `railway run php artisan db:seed --force`
- [ ] Test registration and login
- [ ] Verify file uploads work
- [ ] Check error logs: `railway logs`
- [ ] Test all major features
- [ ] Set up monitoring (optional)

---

## 💡 Quick Reference Commands

### Local Development
```bash
php artisan serve
npm run dev
```

### Build for Production
```bash
composer install --optimize-autoloader --no-dev
npm run build
```

### Railway Commands
```bash
railway login
railway link
railway up
railway logs
railway run php artisan migrate --force
railway status
railway variables
```

---

## 🆘 Emergency Rollback Plan

If deployment fails:

1. **Check logs first**
   ```bash
   railway logs --follow
   ```

2. **Rollback to previous deployment**
   - Railway Dashboard → Deployments → Click previous deployment → "Redeploy"

3. **Fix issues locally**
   - Test thoroughly
   - Commit fixes
   - Push and redeploy

4. **Database rollback** (if needed)
   ```bash
   railway run php artisan migrate:rollback --force
   ```

---

## ✨ Final Pre-Flight Check

Before clicking "Deploy":

- [ ] All checkboxes above completed
- [ ] Code committed and pushed
- [ ] APP_KEY ready to paste
- [ ] Database service added in Railway
- [ ] Documentation reviewed
- [ ] Backup plan in place
- [ ] Feeling confident! 💪

---

## 🎯 Ready to Deploy?

### Quick Deploy (5 minutes):
```bash
# Push to GitHub
git push origin main

# Go to Railway Dashboard
# 1. New Project → From GitHub
# 2. Add Database (MySQL/PostgreSQL)
# 3. Set APP_KEY variable
# 4. Wait for build to complete
# 5. Run: railway run php artisan migrate --force

# Done! 🎉
```

### Or use automated script:
```bash
.\deploy.ps1  # Windows PowerShell
./deploy.sh   # Mac/Linux Bash
```

---

**🚀 You're ready to deploy! Good luck!**

See `QUICK_START.md` for the fastest path to production.
