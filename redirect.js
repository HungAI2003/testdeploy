const fetch = require('node-fetch');

exports.handler = async (event, context) => {
  const ip = event.headers['x-forwarded-for'] || event.connection.remoteAddress;

  const response = await fetch(`https://ipinfo.io/${ip}/json`);
  const geoData = await response.json();

  if (geoData.country === 'US') {
    return {
      statusCode: 302,
      headers: {
        Location: 'https://www.youtube.com',
      },
    };
  } else {
    return {
      statusCode: 302,
      headers: {
        Location: 'https://www.facebook.com',
      },
    };
  }
};
