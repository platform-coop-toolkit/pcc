const PercyScript = require('@percy/script');

PercyScript.run(async (page, percySnapshot) => {
  await page.goto('http://platform.coop.test/');
  await percySnapshot('homepage');
  await page.goto('http://platform.coop.test/events/conference-2017/');
  await percySnapshot('conference');
});
