FROM apify/actor-node-playwright:latest

# Only copy package.json
COPY package.json ./

RUN npm install

# Copy the rest of the source files
COPY ./src ./src

# Start the actor
CMD ["npm", "start"]