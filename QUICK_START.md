# ⚡ Quick Start - Deploy to Railway in 5 Minutes

## 🎯 Fastest Path to Production

### Step 1: Push to GitHub (2 minutes)
```bash
git init
git add .
git commit -m "Ready for Railway deployment"
git branch -M main
git remote add origin YOUR_GITHUB_REPO_URL
git push -u origin main
```

### Step 2: Deploy on Railway (2 minutes)
1. Go to [railway.app](https://railway.app)
2. Click **"Start a New Project"**
3. Select **"Deploy from GitHub repo"**
4. Choose your repository
5. Railway auto-detects the Dockerfile ✅

### Step 3: Add Database (30 seconds)
1. In your project, click **"+ New"**
2. Select **"Database"** → **"MySQL"** (matches your current setup)
3. Done! Connection variables auto-configured ✅

*Note: PostgreSQL also works if you prefer it*

### Step 4: Set APP_KEY (30 seconds)
Run locally:
```bash
php artisan key:generate --show
```

Copy output to Railway:
1. Go to your service → **"Variables"** tab
2. Click **"+ New Variable"**
3. Add `APP_KEY` = `base64:your_generated_key_here`

### Step 5: Run Migrations (30 seconds)
```bash
# Install Railway CLI
npm install -g @railway/cli

# Login
railway login

# Link your project
railway link

# Run migrations
railway run php artisan migrate --force
```

### 🎉 Done! Your app is live!

Check your Railway dashboard for the public URL.

---

## 🛠️ Alternative: One-Command Deploy

### Using PowerShell (Windows):
```powershell
.\deploy.ps1
```

### Using Bash (Mac/Linux):
```bash
chmod +x deploy.sh
./deploy.sh
```

This script:
- ✅ Installs Railway CLI
- ✅ Authenticates
- ✅ Links project
- ✅ Generates APP_KEY
- ✅ Sets environment variables
- ✅ Deploys to Railway

---

## 📋 Post-Deployment Checklist

After deployment, verify:

- [ ] App is accessible at Railway URL
- [ ] Health check works: `https://your-app.railway.app/up`
- [ ] Database connected (check logs)
- [ ] Assets loading (CSS/JS)
- [ ] Login/registration works

---

## 🐛 Troubleshooting

### "Vite manifest not found"
```bash
railway logs
# Look for build errors
# Ensure npm run build completed
```

### "Database connection failed"
Check Railway variables:
```bash
railway variables
# Verify DB_CONNECTION matches your database type
```

### "500 Error"
```bash
railway run php artisan config:cache
railway logs
```

---

## 📚 Next Steps

- Configure email (MAIL_* variables)
- Set up file storage (S3 recommended)
- Add Redis for caching
- Configure custom domain
- Set up monitoring

See [DEPLOYMENT.md](DEPLOYMENT.md) for detailed instructions.

---

**Need help?** Check Railway logs:
```bash
railway logs --follow
```
