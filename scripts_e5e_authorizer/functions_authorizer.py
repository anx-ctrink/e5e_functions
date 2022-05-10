#
# The following functions test the cpu (quota cpu)
#

def allow(event, context):
    return {'status': 200, 'data': 'OK'}


def disallow(event, context):
    return {'status': 400, 'data': 'NOK'}