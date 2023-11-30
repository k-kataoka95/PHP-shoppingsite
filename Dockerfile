# image
FROM mysql:8.0-debian

# Set my.cnf
COPY ./config/mysql/my.cnf /etc/mysql/conf.d/my.cnf

# Set Japanese
RUN apt-get update && apt-get install -y \
    locales \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
RUN sed -i -E 's/# (ja_JP.UTF-8)/\1/' /etc/locale.gen \
    && locale-gen
ENV LANG ja_JP.UTF-8