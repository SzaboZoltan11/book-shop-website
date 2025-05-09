const fs = require('fs');
const { Builder, By } = require('selenium-webdriver');

async function testRegistration() {
    let driver = await new Builder().forBrowser('chrome').build();
    let log = '';
    const timestamp = Date.now();
    const email = `teszt${timestamp}@example.com`;
    const phone = '06701234567';

    try {
        await driver.get('http://localhost/bookshop/web/registration.php');

        await driver.findElement(By.name('surname')).sendKeys('Tesztvezetéknév');
        await driver.findElement(By.name('firstname')).sendKeys('Tesztkeresztnév');
        await driver.findElement(By.name('email')).sendKeys(email);
        await driver.findElement(By.name('phone_number')).sendKeys(phone);
        await driver.findElement(By.name('password')).sendKeys('Teszt123@');
        await driver.findElement(By.name('password_confirm')).sendKeys('Teszt123@');
        await driver.findElement(By.name('accept')).click(); 
        await driver.findElement(By.css('form button[type="submit"]')).click();

        await driver.sleep(3000);

        let currentUrl = await driver.getCurrentUrl();
        if (currentUrl.includes('logination.php')) {
            log = `✅ [SIKERES] Sikeres regisztráció: ${email}\n`;
        } else {
            log = `❌ [SIKERTELEN] Nem sikerült a regisztráció: ${email}\n`;
        }
    } catch (error) {
        log = `❌ [HIBA] Hiba a regisztrációs teszt során: ${error.message}\n`;
    } finally {
        fs.appendFileSync('test_log.txt', new Date().toISOString() + ' - ' + log);
        await driver.quit();
    }
}

testRegistration();
