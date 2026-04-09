# Log In With Microsoft

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/xrh0905/oauth-microsoft.svg)](https://packagist.org/packages/xrh0905/oauth-microsoft) [![Total Downloads](https://img.shields.io/packagist/dt/xrh0905/oauth-microsoft.svg)](https://packagist.org/packages/xrh0905/oauth-microsoft)

![](https://extiverse.com/extension/xrh0905/oauth-microsoft/open-graph-image)

Log in to your Flarum forum with Microsoft. An addon for [FoF OAuth](https://github.com/friendsofflarum/oauth).

Supports personal Microsoft accounts (Outlook, Hotmail, Live) as well as work and school accounts via [Microsoft Entra ID](https://learn.microsoft.com/en-us/entra/identity/) (Azure Active Directory).

## Installation

Install with composer:

```sh
composer require xrh0905/oauth-microsoft
php flarum cache:clear
```

## Updating

```sh
composer update xrh0905/oauth-microsoft
php flarum cache:clear
```

## Setup

### 1. Register an Application in the Azure Portal

1. Sign in to the [Azure Portal](https://portal.azure.com).
2. Navigate to **Microsoft Entra ID** → **App registrations** → **New registration**.
3. Fill in the form:
   - **Name**: anything descriptive, e.g. *My Flarum Forum*.
   - **Supported account types**: choose who can sign in (see [Choosing a Tenant](#choosing-a-tenant) below).
   - **Redirect URI**: choose **Web** as the platform, then paste the callback URL shown in this extension's settings page in your Flarum Admin panel (it looks like `https://your-forum.com/auth/microsoft`).
4. Click **Register**.

### 2. Obtain the Client ID and Client Secret

1. On the application's **Overview** page, copy the **Application (client) ID** — this is your `Client ID`.
2. Go to **Certificates & secrets** → **New client secret**.
3. Enter a description and choose an expiry, then click **Add**.
4. Copy the **Value** immediately (it is only shown once) — this is your `Client Secret`.

### 3. Configure the Extension

In your Flarum Admin panel, go to **Extensions → Log In With Microsoft** and enter the `Client ID` and `Client Secret` obtained above. If you want to restrict sign-in to a specific audience, also set the **Tenant** field (see below).

---

## Choosing a Tenant

The **Tenant** field controls which Microsoft accounts are allowed to sign in. Leave it blank to accept all account types.

| Value | Who can sign in |
|---|---|
| *(blank)* / `common` | Personal Microsoft accounts **and** work/school (Azure AD) accounts from any organisation |
| `organizations` | Work/school (Azure AD) accounts from any organisation only |
| `consumers` | Personal Microsoft accounts (Outlook, Hotmail, Live) only |
| A tenant ID (GUID) | Only accounts from that specific Azure AD tenant, e.g. `xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx` |
| A primary domain | Only accounts from that Azure AD tenant, e.g. `contoso.com` |

> **Tip:** If your forum is for an organisation and you want to restrict sign-in to your company's Azure AD, set the tenant to your tenant ID or your primary domain. You can find your tenant ID on the **Microsoft Entra ID → Overview** page in the Azure Portal.

> **Note:** If you set **Supported account types** to *Single tenant* in the Azure Portal, you must also set the **Tenant** field here to your tenant ID or domain, otherwise the authentication endpoint will reject requests.

---

## Links

- [Packagist](https://packagist.org/packages/xrh0905/oauth-microsoft)
- [GitHub](https://github.com/xrh0905/flarum-ext-oauth-microsoft)
- [Discuss](https://github.com/xrh0905/flarum-ext-oauth-microsoft/discussions)
