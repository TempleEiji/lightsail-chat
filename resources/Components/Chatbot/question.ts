export type QuestionRes = {
    step: number
    msg: string
    beforemsg: string
    aftermsg: string
    // eslint-disable-next-line no-use-before-define
    options: Options[]
    sender: string
}

export type Options = {
    step: number,
    text: string,
    img: string,
    list: []
}