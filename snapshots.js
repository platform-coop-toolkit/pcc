const PercyScript = require('@percy/script');

PercyScript.run(async (page, percySnapshot) => {
  await page.goto('http://platform.coop.test/');
  await percySnapshot('homepage');
});
