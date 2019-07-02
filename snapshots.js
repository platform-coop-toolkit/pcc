const PercyScript = require('@percy/script');

const options = {
  ignoreHTTPSErrors: true,
};

PercyScript.run(async (page, percySnapshot) => {
  await page.goto('https://platform.coop.test/');
  await percySnapshot('home');
  await page.goto('https://platform.coop.test/contact-us/');
  await percySnapshot('contact');
  await page.goto('https://platform.coop.test/open-access-and-privacy-policy/');
  await percySnapshot('privacy');
  await page.goto('https://platform.coop.test/about/');
  await percySnapshot('about');
  await page.goto('https://platform.coop.test/about/vision-and-advantages/');
  await percySnapshot('vision');
  await page.goto('https://platform.coop.test/about/benefits/about/benefits/member-owners/');
  await percySnapshot('benefits');
  await page.goto('https://platform.coop.test/events/conference-2017/');
  await percySnapshot('event');
}, options);
