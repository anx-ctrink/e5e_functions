import os


def func_return_simple_secret(event, context):
    print(os.environ['SECRET_1'])
    print(os.environ['SECRET_1'])
    print(os.environ['SECRET_2'])
    print(os.environ['SECRET_2'])

    return {
        'data': {
            'secrets': [
                os.environ['SECRET_1'],
                os.environ['SECRET_2'],
            ]
        }
    }