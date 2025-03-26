import { test as base, type Page } from '@playwright/test';
import path from 'path';

class PersonContext {
  // Page signed in as "person-1".
  page: Page;

  constructor(page: Page) {
    this.page = page;
  }
}

type MyFixtures = {
  person1: PersonContext;
  person2: PersonContext;
};

export const test = base.extend<MyFixtures>({
  person1: async ({ browser }, use) => {
    const context = await browser.newContext({
      storageState: path.join(__dirname, '../.auth/person-1.json'),
    });
    const person1 = new PersonContext(await context.newPage());
    await use(person1);
    await context.close();
  },
  person2: async ({ browser }, use) => {
    const context = await browser.newContext({
      storageState: path.join(__dirname, '../.auth/person-2.json'),
    });
    const person2 = new PersonContext(await context.newPage());
    await use(person2);
    await context.close();
  },
});
