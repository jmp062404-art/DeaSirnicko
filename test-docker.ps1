# Test Docker Build Locally (PowerShell)
# Usage: .\test-docker.ps1

$ErrorActionPreference = "Stop"

Write-Host "🐳 Testing Docker Build Locally..." -ForegroundColor Cyan

# Check if Docker is running
Write-Host "`n📋 Checking Docker..." -ForegroundColor Yellow
try {
    docker version | Out-Null
    Write-Host "✅ Docker is running" -ForegroundColor Green
} catch {
    Write-Host "❌ Docker is not running. Please start Docker Desktop." -ForegroundColor Red
    exit 1
}

# Build the image
Write-Host "`n🔨 Building Docker image..." -ForegroundColor Yellow
Write-Host "This may take 5-10 minutes on first build..." -ForegroundColor Gray
docker build -t deasirnicko:test .

if ($LASTEXITCODE -ne 0) {
    Write-Host "`n❌ Docker build failed!" -ForegroundColor Red
    exit 1
}

Write-Host "`n✅ Docker image built successfully!" -ForegroundColor Green

# Ask if user wants to run the container
Write-Host "`n🚀 Would you like to run the container? (y/n)" -ForegroundColor Yellow
$response = Read-Host

if ($response -eq "y" -or $response -eq "Y") {
    Write-Host "`n📦 Starting container..." -ForegroundColor Yellow
    
    # Check if .env exists, if not copy from example
    if (-not (Test-Path ".env")) {
        Write-Host "Creating .env from .env.example..." -ForegroundColor Yellow
        Copy-Item ".env.example" ".env"
    }
    
    # Run container
    docker run -d `
        --name deasirnicko-test `
        -p 8080:8080 `
        -e APP_KEY=base64:test1234567890123456789012345678901234567890 `
        -e APP_ENV=local `
        -e APP_DEBUG=true `
        -e DB_CONNECTION=sqlite `
        deasirnicko:test
    
    Write-Host "`n✅ Container started!" -ForegroundColor Green
    Write-Host "`n🌐 Application should be available at: http://localhost:8080" -ForegroundColor Cyan
    Write-Host "🏥 Health check: http://localhost:8080/up" -ForegroundColor Cyan
    
    Write-Host "`n📊 Viewing container logs (Ctrl+C to stop)..." -ForegroundColor Yellow
    Write-Host "To stop container: docker stop deasirnicko-test" -ForegroundColor Gray
    Write-Host "To remove container: docker rm deasirnicko-test" -ForegroundColor Gray
    Write-Host ""
    
    docker logs -f deasirnicko-test
} else {
    Write-Host "`n✅ Build test complete!" -ForegroundColor Green
    Write-Host "`nTo run the container later:" -ForegroundColor Yellow
    Write-Host "  docker run -d -p 8080:8080 --name deasirnicko-test deasirnicko:test" -ForegroundColor Gray
    Write-Host "`nTo clean up:" -ForegroundColor Yellow
    Write-Host "  docker rmi deasirnicko:test" -ForegroundColor Gray
}
