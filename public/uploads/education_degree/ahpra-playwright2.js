//import { Actor } from 'apify';
import { chromium } from 'playwright';

// List of user-agent strings
const userAgents = [
  'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
  'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36',
  'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0',
  'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36',
  'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; AS; rv:11.0) like Gecko'
];

(async () => {
  const browser = await chromium.launch({ headless: false });

  // Randomly pick a user agent from the list
  const randomUserAgent = userAgents[Math.floor(Math.random() * userAgents.length)];

  // Create a new browser context with the random user-agent
  const context = await browser.newContext({
    userAgent: randomUserAgent
  });

  const page = await context.newPage();

  // Additional headers if needed
  await page.setExtraHTTPHeaders({
    'Accept-Language': 'en-US,en;q=0.9',
    'Accept-Encoding': 'gzip, deflate, br',
    'Connection': 'keep-alive',
    'Upgrade-Insecure-Requests': '1'
  });

  await page.goto('https://www.ahpra.gov.au/Registration/Registers-of-Practitioners.aspx');
  
  await page.fill('#name-reg', 'NMW0001461217', { delay: 150 });  // Mimic typing with delay
  await page.click('#predictiveSearchHomeBtn');  // Click Search button
  
  await page.waitForTimeout(20000);  // Wait for the page to load
  const html = await page.content();  // Get the page content
  console.log(html);  // Display the content of the page
  
  // Wait for the results table to appear (adjust selector if needed)
  await page.waitForSelector('.search-results-table-row');

  // Extract data using page.$$eval
  const results = await page.$$eval('.search-results-table-body .search-results-table-row', rows => {
    return rows.map(row => {
      const getText = (selector) => {
        const el = row.querySelector(selector);
        return el ? el.innerText.trim() : '';
      };

      return {
        practitionerName: getText('.search-results-table-col:nth-child(1) .text a'),
        profession: getText('.search-results-table-col:nth-child(2) .text p'),
        division: getText('.col.division .text p'),
        registrationType: getText('.col.reg-type .text p'),
        speciality: getText('.col.speciality .text p')
      };
    });
  });
  
  console.log(results);
  
  //await browser.close();
})();
