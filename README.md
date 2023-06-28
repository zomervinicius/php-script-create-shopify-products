# Shopify Giphy Products

This project allows you to create Shopify products using trending Giphy GIFs and track events with Google Analytics.

## Prerequisites

- PHP installed on your system
- Access to a Shopify store
- Giphy API key
- Shopify store URL
- Shopify Admin API access token

## Setup

1. Clone the repository.

2. Create a `.env` file in the root directory of the project with the following variables:

```
GIPHY_API_KEY=your_giphy_api_key
SHOPIFY_STORE_URL=https://yourshopifystore.myshopify.com
SHOPIFY_ACCESS_TOKEN=your-admin-api-access-token
GA_TRACKING_ID=your-tracking-id
```

Replace `your-admin-api-access-token` with your actual Shopify Admin API access token.

3. Run the root file to create Shopify products using trending Giphy GIFs:

`php create-shopify-products-from-giphy-trending.php`

4. Run the Shopify theme development server with the following command:

`shopify theme dev --store=SHOPIFY_STORE_URL`

Replace `SHOPIFY_STORE_URL` with the URL of your Shopify store.

5. Go to the catalogs page in your Shopify store and search for a Giphy GIF.

6. Click on the GIF and check if it triggers the Google Analytics event.

Note: Make sure you have set up Google Analytics properly and configured the event tracking.
