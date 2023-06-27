# php-script-create-shopify-products

<a name="br1"></a>

Send to candidate

We are gonna create an Online Gift-as-NFT store; this means we are gonna sell gifts in a similar

way it happened with the NFT Marketplace explosion some time ago.

Have the following pre-requisites ready before the challenge has started; having these

prerequisites not ready is going to cause problems, as there is not gonna be enough time to

develop the challenge in the pair programming session.

1\. [Shopify-cli](https://shopify.dev/docs/themes/tools/cli/install)

2\. Have natively installed Ruby and/or PHP (you can also use Docker).

3\. Have a Shopify Partner Account and a log in.

4\. Have a Shopify Online [store](https://www.shopify.com/partners/blog/shopify-online-store)[ ](https://www.shopify.com/partners/blog/shopify-online-store)2.0 created for test and development .

5\. Recommended but not mandatory: Pull the sample theme the app comes with (Dawn) to

modify in your local machine, or prepare yourself to create a theme from scratch using

[best](https://shopify.dev/docs/themes/best-practices)[ ](https://shopify.dev/docs/themes/best-practices)[practices](https://shopify.dev/docs/themes/best-practices).

6\. Get the following values for development

**Keys Needed**

giphy_api_key = 'your-giphy-api-key'

shopify_url = 'https://your-store-name.myshopify.com'

secret_token = ‘your-shopify-secret-token’

The Giphy API key **is a real value** provided by the company for you to use in querying the

Giphy API, which is gonna be done in the next step. For the other values, please follow next

step.

7\. For the shopify values, you are gonna need to authorize a private app to access your

store; for this:

a. Log in to your Shopify admin.

b. From your Shopify admin, go to Apps.

<a name="br2"></a>

c. Click on Allow Custom Development Apps and accept terms and conditions.

d. Click on 'Create new custom app' and provide your developer name and email.

e. In the Admin API section, select the areas of your store that you want the app to

access. For the task at hand, you'll need access to 'Products’ and 'Themes'. Set

their access to 'Read and write'.

f. Click 'Save' to create the app.

g. We are gonna use the Admin [API](https://shopify.dev/docs/api/admin). For this we need to retrieve the token. Go to

the API Credentials tab and retrieve it.

<a name="br3"></a>

8\. Create a script in the root of this store that will query the Giphy API Trending [endpoin](https://developers.giphy.com/docs/api/endpoint/#trending)[t](https://developers.giphy.com/docs/api/endpoint/#trending).

Please build this script in either Ruby or PHP, whatever language you feel more

comfortable with. Then, for each gif pulled, please add it as a product using the Shopify

product admin [AP](https://shopify.dev/docs/api/admin)[I](https://shopify.dev/docs/api/admin). Gifs are gonna have a default variant with a random price. Add at

least one more variant per gif where it changes is the height and width of the Gif. This

script should be executable from the command line and include error handling for cases

such as failed API calls or rate limiting. Make sure GIF still images are loaded as product

images. In the catalogs page and the GIF is in movement in the product detail page

Note: Please don’t commit sensitive values like API keys to Github or any source control tool;

Use .env files to handle these values.

9\. Add the code done until now to a Github/Gitlab/Bitbucket public repo.

10\. Create a Google (or use your existing Google) account, and set up [GA4](https://support.google.com/analytics/answer/9304153#account)[ ](https://support.google.com/analytics/answer/9304153#account)to be used with

your account and this new store. We are gonna track user interactions in the store.
