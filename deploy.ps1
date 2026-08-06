# Railway Deployment Script for DeaSirnicko (PowerShell)
# Usage: .\deploy.ps1

$ErrorActionPreference = "Stop"

Write-Host "🚀 Starting Railway Deployment Process..." -ForegroundColor Cyan

# Check if Railway CLI is installed
$railwayInstalled = Get-Command railway -ErrorAction SilentlyContinue
if (-not $railwayInstalled) {
    Write-Host "❌ Railway CLI not found" -ForegroundColor Red
    Write-Host "Installing Railway CLI..." -ForegroundColor Yellow
    npm install -g @railway/cli
}

# Check if logged in
Write-Host "📝 Checking Railway authentication..." -ForegroundColor Yellow
try {
    railway whoami
} catch {
    railway login
}

# Check if project is linked
if (-not (Test-Path ".railway")) {
    Write-Host "🔗 Linking to Railway project..." -ForegroundColor Yellow
    railway link
}

# Generate APP_KEY if not exists
Write-Host "🔑 Checking APP_KEY..." -ForegroundColor Yellow
$appKey = railway variables get APP_KEY 2>$null
if (-not $appKey) {
    Write-Host "Generating new APP_KEY..." -ForegroundColor Yellow
    $newKey = php artisan key:generate --show
    railway variables set APP_KEY="$newKey"
    Write-Host "✅ APP_KEY generated and set" -ForegroundColor Green
} else {
    Write-Host "✅ APP_KEY already exists" -ForegroundColor Green
}

# Set production environment variables
Write-Host "⚙️  Setting environment variables..." -ForegroundColor Yellow
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
Write-Host "✅ Environment variables configured" -ForegroundColor Green

# Deploy
Write-Host "📦 Deploying to Railway..." -ForegroundColor Yellow
railway up

Write-Host "`n✅ Deployment initiated!" -ForegroundColor Green
Write-Host ""
Write-Host "📊 Monitor deployment:"
Write-Host "   railway logs"
Write-Host ""
Write-Host "🌐 Once deployed, run migrations:"
Write-Host "   railway run php artisan migrate --force"
Write-Host ""
Write-Host "🎉 Your app will be live at your Railway domain!"
