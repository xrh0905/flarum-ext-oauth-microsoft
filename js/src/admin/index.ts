import app from 'flarum/admin/app';
import { ConfigureWithOAuthPage } from '@fof-oauth';

app.initializers.add('ianm/oauth-amazon', () => {
  app.extensionData.for('ianm-oauth-amazon').registerPage(ConfigureWithOAuthPage);
});
