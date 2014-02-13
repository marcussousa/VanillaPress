
# Vanilla Press - Wordpress Theme
Vanilla é um tema minimalista, puro e com um markup bem básico.
Perfeito para quem quer começar do zero usando apenas o core do Wordpress.
Vanilla utiliza o Sass Bootstrap 3 como pré-processador e Grunt para gerar o CSS.

# Segurança
Vanilla foi feito com base nas melhores práticas de segurança. Old but Gold [Smashing Magazine](http://wp.smashingmagazine.com/2010/07/01/10-useful-wordpress-security-tweaks/)

# Como funciona
1. Instale o [Wordpress](http://wordpress.org/) normalmente
2. Copie o diretório **vanilla** para **wp-contents/theme**
3. Rode grunt para gerar o CSS no diretório assets/css
4. grunt watch

# Extra
O diretório **plugins** contém alguns plugins que considero interessantes.
- Block Bad Queries (Plugin description: What this code does is pretty simple. It checks for excessively long request strings (more than 255 characters) and for the presence of either the eval or base64 PHP functions in the URI. If one of these conditions is met, then the plug-in sends a 414 error to the client’s browser.)

# wp-functions
Wordpress por definição, inclui a tag **META ROBOTS** baseada na sua escolha de deixar o Site ser Indexado ou não.

**O Problema:** É muito comum que se utilize plugins de SEO para ajudar na indexação, e dependendo da combinação das tags ROBOTS, é possível que haja conflito.

**A solução:**
Comentar a linha 58

    remove_action('wp_head', 'noindex', 1);
    // Lembrando que se nenhum plugin de SEO for utilizado, deve-se descomentar a linha acima

# .htaccess
Coloque o arquivo **.htaccess** na raiz do Wordpress.
(O conteúdo do .htaccess também é parcialmente baseado do post [Smashing Magazine](http://wp.smashingmagazine.com/2010/07/01/10-useful-wordpress-security-tweaks/))
