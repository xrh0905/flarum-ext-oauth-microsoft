import app from 'flarum/admin/app';
import { ConfigureWithOAuthPage } from '@fof-oauth';

app.initializers.add('xrh0905/oauth-microsoft', () => {
  app.extensionData.for('xrh0905-oauth-microsoft').registerPage(ConfigureWithOAuthPage);
});
