import { test as setup } from '@playwright/test';

import path from 'path';

const defaultPassword = '222|UG?64YjkiT7£';
setup.describe('Authenticate as', () => {
  const persons = ['person-1', 'person-2'];
  for (const person of persons) {
    setup(`${person}`, async ({ page }) => {
      await page.goto('/dashboard');
      await page.getByLabel('Login Name').fill(`${person}@fake.lychen.fr`);
      await page.getByRole('button', { name: 'Next' }).click();
      await page.getByLabel('Password').fill(defaultPassword);
      await page.getByRole('button', { name: 'Next' }).click();
      const twoFactor = await page.getByRole('heading', { name: '2-Factor Setup' }).isVisible();
      if (twoFactor) {
        await page.getByRole('button', { name: 'Skip' }).click();
      }
      await page.waitForURL('/dashboard');
      await page.context().storageState({ path: path.join(__dirname, `../.auth/${person}.json`) });
    });
  }
});
