  //npm init -y
  //npm install selenium-webdriver
  //fontos, hogy ebbe a test mappába kell belépni, amelyet cd .\test\ -el tudsz megtenni, kilépni cd ..


const fs = require('fs');
const { Builder, By } = require('selenium-webdriver');

async function testLogin() {
    let driver = await new Builder().forBrowser('chrome').build();
    let log = '';
    try {
        await driver.get('http://localhost/bookshop/web/logination.php');
        await driver.findElement(By.id('email')).sendKeys('teszt@example.com');
        await driver.findElement(By.id('password')).sendKeys('teszt123@');
        await driver.findElement(By.id('remember')).click();
        await driver.findElement(By.css('.btn')).click();

        await driver.sleep(3000);  

        let currentUrl = await driver.getCurrentUrl();
        if (currentUrl.includes('index.php')) {
            log = '✅ [SIKERES] A bejelentkezés sikeres\n';
        } else {
            log = '❌ [SIKERTELEN] Hibás adatok.\n';
        }
    } catch (error) {
        log = `❌ [HIBA] Teszt közben hiba történt: ${error.message}\n`;
    } finally {
        fs.appendFileSync('test_log.txt', new Date().toISOString() + ' - ' + log);
        await driver.quit();
    }
}

testLogin();

  
  