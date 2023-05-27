import app from 'flarum/admin/app';
import { ConfigureWithOAuthPage } from '@fof-oauth';

app.initializers.add('ianm/oauth-microsoft', () => {
  app.extensionData.for('ianm-oauth-microsoft').registerPage(ConfigureWithOAuthPage);
});
