# Use a imagem oficial do Nginx
FROM nginx:latest

# Copia o arquivo de configuração personalizado do Nginx para dentro do container
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expor a porta 80 do Nginx
EXPOSE 80

# Inicia o servidor Nginx
CMD ["nginx", "-g", "daemon off;"]