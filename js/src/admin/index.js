import app from 'flarum/admin/app';
import AmazonOAuthPage from './components/AmazonOAuthPage';

app.initializers.add('ianm/oauth-amazon', () => {
  app.extensionData.for('ianm-oauth-amazon').registerPage(AmazonOAuthPage);
});
