

class Config(object):
    APP_NAME = 'Notify'

class ProdConfig(Config):
    pass

class DevConfig(Config):
    DEBUG = True
