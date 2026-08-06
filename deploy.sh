#!/bin/bash
# Railway Deployment Script for DeaSirnicko
# Usage: ./deploy.sh

set -e

echo "🚀 Starting Railway Deployment Process..."

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if Railway CLI is installed
if ! command -v railway &> /dev/null; then
    echo -e "${RED}❌ Railway CLI not found${NC}"
    echo "Installing Railway CLI..."
    npm install -g @railway/cli
fi

# Check if logged in
echo -e "${YELLOW}📝 Checking Railway authentication...${NC}"
railway whoami || railway login

# Check if project is linked
if [ ! -f ".railway" ]; then
    echo -e "${YELLOW}🔗 Linking to Railway project...${NC}"
    railway link
fi

# Generate APP_KEY if not exists
echo -e "${YELLOW}🔑 Checking APP_KEY...${NC}"
APP_KEY=$(railway variables get APP_KEY 2>/dev/null || echo "")
if [ -z "$APP_KEY" ]; then
    echo "Generating new APP_KEY..."
    NEW_KEY=$(php artisan key:generate --show)
    railway variables set APP_KEY="$NEW_KEY"
    echo -e "${GREEN}✅ APP_KEY generated and set${NC}"
else
    echo -e "${GREEN}✅ APP_KEY already exists${NC}"
fi

# Set production environment variables
echo -e "${YELLOW}⚙️  Setting environment variables...${NC}"
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
echo -e "${GREEN}✅ Environment variables configured${NC}"

# Deploy
echo -e "${YELLOW}📦 Deploying to Railway...${NC}"
railway up

echo -e "${GREEN}✅ Deployment initiated!${NC}"
echo ""
echo "📊 Monitor deployment:"
echo "   railway logs"
echo ""
echo "🌐 Once deployed, run migrations:"
echo "   railway run php artisan migrate --force"
echo ""
echo "🎉 Your app will be live at your Railway domain!"
