import emitter from 'tiny-emitter/instance'

export const eventBus = {
    $on: (...args) => emitter.on(...args),
    $emit: (...args) => emitter.emit(...args),
}
