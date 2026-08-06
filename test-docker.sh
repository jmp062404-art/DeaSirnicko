#!/bin/bash
# Test Docker Build Locally
# Usage: ./test-docker.sh

set -e

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
CYAN='\033[0;36m'
GRAY='\033[0;37m'
NC='\033[0m' # No Color

echo -e "${CYAN}🐳 Testing Docker Build Locally...${NC}"

# Check if Docker is running
echo -e "\n${YELLOW}📋 Checking Docker...${NC}"
if ! docker version > /dev/null 2>&1; then
    echo -e "${RED}❌ Docker is not running. Please start Docker.${NC}"
    exit 1
fi
echo -e "${GREEN}✅ Docker is running${NC}"

# Build the image
echo -e "\n${YELLOW}🔨 Building Docker image...${NC}"
echo -e "${GRAY}This may take 5-10 minutes on first build...${NC}"
docker build -t deasirnicko:test .

echo -e "\n${GREEN}✅ Docker image built successfully!${NC}"

# Ask if user wants to run the container
echo -e "\n${YELLOW}🚀 Would you like to run the container? (y/n)${NC}"
read -r response

if [[ "$response" =~ ^[Yy]$ ]]; then
    echo -e "\n${YELLOW}📦 Starting container...${NC}"
    
    # Check if .env exists, if not copy from example
    if [ ! -f ".env" ]; then
        echo -e "${YELLOW}Creating .env from .env.example...${NC}"
        cp .env.example .env
    fi
    
    # Run container
    docker run -d \
        --name deasirnicko-test \
        -p 8080:8080 \
        -e APP_KEY=base64:test1234567890123456789012345678901234567890 \
        -e APP_ENV=local \
        -e APP_DEBUG=true \
        -e DB_CONNECTION=sqlite \
        deasirnicko:test
    
    echo -e "\n${GREEN}✅ Container started!${NC}"
    echo -e "\n${CYAN}🌐 Application should be available at: http://localhost:8080${NC}"
    echo -e "${CYAN}🏥 Health check: http://localhost:8080/up${NC}"
    
    echo -e "\n${YELLOW}📊 Viewing container logs (Ctrl+C to stop)...${NC}"
    echo -e "${GRAY}To stop container: docker stop deasirnicko-test${NC}"
    echo -e "${GRAY}To remove container: docker rm deasirnicko-test${NC}"
    echo ""
    
    docker logs -f deasirnicko-test
else
    echo -e "\n${GREEN}✅ Build test complete!${NC}"
    echo -e "\n${YELLOW}To run the container later:${NC}"
    echo -e "${GRAY}  docker run -d -p 8080:8080 --name deasirnicko-test deasirnicko:test${NC}"
    echo -e "\n${YELLOW}To clean up:${NC}"
    echo -e "${GRAY}  docker rmi deasirnicko:test${NC}"
fi
