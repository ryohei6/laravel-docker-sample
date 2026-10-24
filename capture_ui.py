
import time
from selenium import webdriver
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument('--headless')
options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')

# Connecting to the selenium-chrome container in the same network
driver = webdriver.Remote(
    command_executor='http://selenium-chrome:4444/wd/hub',
    options=options
)

try:
    # Accessing the laravel-server container by its name
    driver.get('http://laravel-server:8000')
    time.sleep(3) # Wait for page to load
    driver.set_window_size(1280, 1024)
    driver.save_screenshot('laravel_ui.png')
    print('Screenshot saved as laravel_ui.png')
finally:
    driver.quit()
